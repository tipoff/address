<template>
  <form
    :action="endpoint"
    method="POST"
    class="coupon"
  >
    <input
      type="hidden"
      name="_token"
      :value="this.csrfToken"
    >

    <h5>Coupon Code</h5>

    <div class="coupon-code">
      <input
        type="text"
        name="code"
        v-model="code"
        required
      >
      <button
        class="button4"
        type="submit"
      >
        Apply Code
      </button>
    </div>
  </form>
</template>

<script>
export default {
  props: {
    vouchersEndpoint: {
      type: String,
      required: true
    },
    discountsEndpoint: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      code: ''
    }
  },
  computed: {
    endpoint () {
      return this.code.length === 9
        ? this.vouchersEndpoint
        : this.discountsEndpoint
    }
  }
}
</script>
