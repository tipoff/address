<template>
  <section class="tger-booking-games-list">
    <div
      class="tger-booking-games-list__pattern-bg"
      style="background-image: url('/img/background/tger-purple-halftone.png');"
    />

    <div class="container tger-booking-games-list__header">
      <div class="row">
        <div class="col-lg-6">
          <h1>{{ formattedDate }}</h1>
        </div>
        <div class="col-lg-6">
          <div class="games-list-selectors">
            <datepicker
              input-class="form-control"
              class="games-list-selectors-datepicker"
              v-model="selectedDate"
              :disabled-dates="{
                to: datesDisabledUntil,
              }"
              @selected="selectDate"
            />
            <theme-selector
              class="form-control"
              v-model="selectedTheme"
              :location="location"
              @selected="selectTheme"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="container tger-booking-games-list__games">
      <div class="row">
        <div class="col-12 mt-5">
          <error-message />

          <div v-if="filteredGames.length > 0">
            <template v-for="game in filteredGames">
              <game-item
                :key="game.id"
                :game="game"
                :market="market"
                :location="location"
              />
            </template>
          </div>

          <div
            v-if="exceptionMessage"
            v-html="exceptionMessage"
          />

          <div v-if="isLoading">
            Loading...
          </div>
        </div>
      </div>
    </div>
    <div class="container tger-booking-games-list__bottom">
      <div class="row">
        <div class="col-12 mt-5 change-date">
          <div>
            <h3>Change date from {{ formattedDate }}</h3>
          </div>
          <div class="date-buttons">
            <div class="date-button-container">
              <button
                class="button6 previous-date"
                @click="selectDate(previousDay)"
                v-if="canBrowsePreviousDays"
              >
                Previous Day
              </button>
            </div>
            <div class="date-button-container">
              <button
                class="button6 next-date"
                @click="selectDate(nextDay)"
              >
                Next Day
              </button>
            </div>
          </div>
          <div class="date-selector">
            <datepicker
              input-class="form-control"
              class="date-selector-datepicker"
              v-model="selectedDate"
              :disabled-dates="{
                to: datesDisabledUntil,
              }"
              @selected="selectDate"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import GameItem from './GameItem'
import ThemeSelector from './ThemeSelector'
import ErrorMessage from './ErrorMessage'
import Datepicker from 'vuejs-datepicker'
import loader from '../mixins/loader'
import scrollToTop from '../mixins/scroll-top'
import momentDecorator from '../moment-decorator'

export default {
  components: {
    Datepicker,
    GameItem,
    ThemeSelector,
    ErrorMessage
  },
  props: {
    market: {
      type: Object,
      required: true
    },
    location: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      selectedTheme: '',
      selectedDate: '',
      momentDecorator
    }
  },
  mixins: [
    loader,
    scrollToTop
  ],
  created () {
    this.setDateFromQueryString()
    this.setThemeFromQueryString()

    this.loadGames()
  },
  methods: {
    setDateFromQueryString () {
      const date = this.$router.currentRoute.query.date

      const newDate = this.moment(date).add(6, 'hours').toSimpleDateTimeString()

      this.selectedDate = date ? new Date(newDate) : new Date()
    },
    setThemeFromQueryString () {
      const theme = this.$router.currentRoute.query.theme

      this.selectedTheme = theme || ''
    },
    selectDate (date) {
      this.selectedDate = date

      this.addDateQueryStringToUrl(date)

      this.loadGames()

      this.scrollToTop()
    },
    selectTheme () {
      this.addThemeQueryStringToUrl(this.selectedTheme)

      this.loadGames()
    },
    loadGames () {
      this.startLoading()

      const params = {
        locationSlug: this.location.slug,
        date: this.selectedDate
      }

      this.$store.dispatch('getAvailableGames', params)
        .finally(() => this.stopLoading())
    },
    addThemeQueryStringToUrl (theme) {
      this.$router.push({
        query: Object.assign({}, this.$router.currentRoute.query, { theme })
      })
    },
    addDateQueryStringToUrl (date) {
      const urlDate = this.momentDecorator(date).toSimpleDateString()

      this.$router.push({
        query: Object.assign({}, this.$router.currentRoute.query, { date: urlDate })
      })
    }
  },
  computed: {
    formattedDate () {
      return this.moment(this.selectedDate)
        .calendar(null, {
          sameDay: '[Today]',
          nextDay: '[Tomorrow]',
          nextWeek: 'dddd, MMMM Do',
          lastDay: '[Yesterday]',
          lastWeek: 'dddd, MMMM Do',
          sameElse: 'dddd, MMMM Do'
        })
    },
    datesDisabledUntil () {
      return this.momentDecorator()
        .previousDay()
        .toDate()
    },
    games () {
      return this.$store.getters.availableGames
    },
    nextDay () {
      return this.momentDecorator(this.selectedDate)
        .nextDay()
        .toSimpleDateTimeString()
    },
    previousDay () {
      return this.momentDecorator(this.selectedDate)
        .previousDay()
        .toSimpleDateTimeString()
    },
    canBrowsePreviousDays () {
      return this.momentDecorator(this.selectedDate).isFuture()
    },
    closestSaturday () {
      return this.momentDecorator()
        .closestWeekday(6)
        .toDate()
    },
    exceptionMessage () {
      const date = this.momentDecorator(this.selectedDate)

      if (this.isLoading || this.filteredGames.length > 0) {
        return null
      }

      if (date.monthsFromNow() > 6) {
        return 'Please <a href="/company/reservations">contact us</a> to plan an escape room experience for this day.'
      }

      if (date.isPast()) {
        return 'This day is in the past. Please <a href="/company/book-online">book an upcoming game</a>.'
      }

      if (date.isMonday()) {
        return 'Regular hours from Wednesday through Sunday. By appointment only on Monday and Tuesday. Please <a href="/company/reservations">contact us for a reservation</a>.'
      }

      if (date.isTuesday()) {
        return 'Regular hours from Wednesday through Sunday. By appointment only on Monday and Tuesday. Please <a href="/company/reservations">contact us for a reservation</a>.'
      }

      if (date.isToday()) {
        return 'There are no remaining games available for today. Please <a href="/company/reservations">contact us</a> for last-minute bookings.'
      }

      return 'There are no available games for this date. Feel free to <a href="/company/reservations">contact us</a> to coordinate a special event.'
    },
    filteredGames () {
      let games = this.games

      if (this.selectedTheme) {
        games = games.filter(game => {
          return game.room.data.theme.data.slug === this.selectedTheme
        })
      }

      return games
    }
  }
}
</script>

<style lang="scss">
    .games-list-selectors-datepicker div.vdp-datepicker__calendar {
        right: 0 !important;
        @media(max-width: 991px) {
            width: 100%;
        }
    }
</style>
