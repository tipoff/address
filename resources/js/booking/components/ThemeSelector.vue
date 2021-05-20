<template>
  <select
    v-model="selectedTheme"
    @change="changeTheme"
  >
    <option value="">
      Filter by Theme
    </option>

    <template v-for="theme in themes">
      <option
        :value="theme.slug"
        :key="theme.slug"
      >
        {{ theme.title }}
      </option>
    </template>
  </select>
</template>

<script>
export default {
  props: {
    value: {},
    location: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      themes: [],
      selectedTheme: ''
    }
  },
  created () {
    this.selectedTheme = this.value

    this.loadThemes()
  },
  methods: {
    loadThemes () {
      // eslint-disable-next-line no-undef
      axios.get(`/api/themes?filter[location]=${this.location.slug}`)
        .then(response => {
          this.themes = response.data.data
        })
    },
    changeTheme () {
      this.$emit('input', this.selectedTheme)
      this.$emit('selected', this.selectedTheme)
    }
  }
}
</script>
