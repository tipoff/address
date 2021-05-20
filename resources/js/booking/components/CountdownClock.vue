<template>
  <div class="countdown-timer">
    <div>
      <span v-if="loaded">{{ displayMinutes }}:{{ displaySeconds }}</span>
      <span v-if="expired">(Expired)</span>
    </div>
    <div>
      <p>Holding your booking. <strong>Please do not leave or refresh this page to secure your booking.</strong></p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    end: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      displayMinutes: 0,
      displaySeconds: 0,
      loaded: false,
      expired: false
    }
  },
  mounted () {
    this.countDown()
  },
  methods: {
    countDown () {
      const timer = setInterval(() => {
        const interval = this.getInterval()

        if (interval < 0) {
          clearInterval(timer)

          this.expired = true

          return
        }

        this.displayMinutes = this.calculateMinutes(interval)
        this.displaySeconds = this.calculateSeconds(interval)

        this.loaded = true
      }, this.millisecondsPerSecond)
    },
    getInterval () {
      const now = this.moment.utc()

      const diffUntilTimeout = this.timeout.diff(now)

      const interval = this.moment.duration(diffUntilTimeout)
        .asMilliseconds()

      return interval
    },
    twoDigits (number) {
      return number < 10 ? `0${number}` : number
    },
    calculateMinutes (interval) {
      let minutes = (interval % this.millisecondsPerHour) / this.millisecondsPerMinute

      minutes = Math.floor(minutes)

      return this.twoDigits(minutes)
    },
    calculateSeconds (interval) {
      let seconds = (interval % this.millisecondsPerMinute) / this.millisecondsPerSecond

      seconds = Math.floor(seconds)

      return this.twoDigits(seconds)
    }
  },
  computed: {
    millisecondsPerSecond () {
      return 1000
    },
    millisecondsPerMinute () {
      return this.millisecondsPerSecond * 60
    },
    millisecondsPerHour () {
      return this.millisecondsPerMinute * 60
    },
    timeout () {
      return this.moment.utc(this.end)
    }
  }
}
</script>
