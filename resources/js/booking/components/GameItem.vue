<template>
  <div class="game-item">
    <div class="game-item__top">
      <div class="game-top-left">
        <div class="left-mobile">
          <span class="game-start">{{ item.time }}</span>
          <span class="game-participants">{{ openAvailability }}</span>
        </div>
        <span class="game-start left-desktop">{{ item.time }}</span>
        <span class="game-theme">
          <img
            :src="item.icon_url"
            :alt="item.theme"
            :title="item.theme"
            class="img-fluid"
          >
          {{ item.theme }}
        </span>
        <span class="game-participants d-none d-md-block">{{ openAvailability }}</span>
      </div>
      <div class="game-top-right">
        <button
          type="button"
          @click="showCard = !showCard"
          class="button6"
          v-show="!showCard"
          v-if="selectCTA(item)"
        >
          Select
        </button>
        <button
          type="button"
          class="button10"
          disabled
          v-if="soldCTA(item)"
        >
          Sold Out
        </button>
        <button
          type="button"
          class="button10"
          disabled
          v-if="reservedCTA(item)"
        >
          Reserved
        </button>
        <button
          type="button"
          @click="showCard = !showCard"
          class="button-link"
          v-show="showCard"
        >
          X
        </button>
      </div>
    </div>
    <div
      class="game-item__inner"
      v-show="showCard"
    >
      <div class="game-inner-left">
        <div class="game-inner-left-video">
          <div class="game-inner-left-video__bg" />
          <div class="game-inner-left-video__video-container">
            <div class="embed-container">
              <iframe
                :src="'https://www.youtube.com/embed/' + item.youtube"
                frameborder="0"
                allowfullscreen
              />
            </div>
          </div>
        </div>
        <div class="game-inner-description">
          <button
            class="button5"
            type="button"
            @click="showDescription = !showDescription"
          >
            <span v-show="!showDescription">Show Room Description</span>
            <span v-show="showDescription">Hide Room Description</span>
          </button>
          <p v-show="showDescription">
            {{ item.description }}
          </p>
        </div>
      </div>
      <div class="game-inner-right">
        <form
          method="POST"
          :action="`/${ market.slug }/book-online/cart-items/${ location.slug }`"
        >
          <input
            type="hidden"
            name="_token"
            :value="csrfToken"
          >

          <input
            type="hidden"
            name="slot_number"
            :value="game.slot_number"
          >

          <input
            type="hidden"
            name="is_private"
            :value="+(rateType === 'private')"
          >

          <div class="tger-button-container">
            <h4>{{ item.date | moment('dddd, MMM Do') }}</h4>
            <p>Private Game</p>
          </div>
          <hr>
          <h4 class="mb-4">
            {{ item.time }} | {{ item.duration }} min | {{ maxAvailable }}
          </h4>

          <h5><strong>{{ item.pitch }}</strong></h5>

          <h5><strong>Prices vary based on the number of participants.</strong></h5>

          <div class="game-inner-player-number">
            <select
              class="form-control"
              v-if="item.maxParticipants > 0"
              v-model="participantCount"
              name="participants"
            >
              <template v-for="count in countOptions">
                <option
                  :key="count"
                  :value="count"
                >
                  {{ count }}
                </option>
              </template>
            </select>

            <span>Participants, {{ ratePerParticipant | dollars }} Per Person.</span>
          </div>

          <div class="game-inner-total-continue">
            <h3>Total: {{ totalRate | dollars }}</h3>

            <button
              class="button6"
              type="submit"
            >
              Book {{ rateType }} Game
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import loader from '../mixins/loader'
import redirect from '../mixins/redirect'

export default {
  props: {
    game: {
      type: Object,
      required: true
    },
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
      rateType: 'private',
      participantCount: 4,
      showDescription: false,
      showCard: false
    }
  },
  mixins: [
    loader,
    redirect
  ],
  methods: {
    selectCTA (item) {
      return item.maxParticipants > 0 && item.has_hold === false
    },
    soldCTA (item) {
      return item.maxParticipants < 1
    },
    reservedCTA (item) {
      return !!item.has_hold
    }
  },
  computed: {
    countOptions () {
      let min = 1
      let max = this.game.participants_available
      if (this.rateType === 'private') {
        if (this.game.room.data.location_id === 2 || this.game.room.data.location_id === 5) {
          min = 4
        } else {
          min = 4
        }
        max = this.game.room.data.participants_private
      }
      return Array.apply(null, { length: max + 1 }).map(Number.call, Number).slice(min)
    },
    maxAvailable () {
      return this.game.room.data.participants_private + ' available'
    },
    openAvailability () {
      if (this.game.participants_available < 1) {
        return 'No Availability'
      }
      if (this.game.has_hold) {
        return 'Not Available Right Now'
      }
      return 'Private (Up to ' + this.game.room.data.participants_private + ')'
    },
    ratePerParticipant () {
      const column = `${this.rateType}_${this.participantCount}`

      return this.game.rate.data[column]
    },
    totalRate () {
      return this.ratePerParticipant * this.participantCount
    },
    item () {
      return {
        date: this.game.date,
        start: this.game.start_at,
        time: this.game.time,
        theme: this.game.room.data.theme.data.title,
        duration: this.game.room.data.theme.data.duration,
        icon_url: this.game.room.data.theme.data.icon_url,
        youtube: this.game.room.data.theme.data.youtube,
        pitch: this.game.room.data.theme.data.pitch,
        maxParticipants: this.game.participants_available,
        maxPrivate: this.game.room.data.participants_private,
        has_hold: this.game.has_hold,
        description: this.game.room.data.theme.data.synopsis
      }
    }
  }
}
</script>
