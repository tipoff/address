<template>
  <form
    method="POST"
    :action="`/${ market.slug }/book-online/checkout/${ location.slug }`"
    ref="form"
  >
    <div class="checkout-header">
      <h3>Checkout</h3>
      <button
        class="button5"
        @click="toggle"
      >
        Waiver
      </button>
    </div>

    <div
      class="location-waiver"
      v-show="show"
    >
      {{ location.waiver }}
    </div>

    <input
      type="hidden"
      name="_token"
      :value="csrfToken"
    >

    <input
      type="hidden"
      name="payment_method_id"
      :value="paymentMethodId"
    >

    <div class="form-group">
      <label for="">Payment Details</label>
      <div ref="stripeCard" />
    </div>

    <div class="form-group">
      <label for="card-holder-name">Cardholder Name</label>
      <input
        type="text"
        id="card-holder-name"
        class="form-control"
        v-model="cardHolderName"
      >
    </div>

    <div class="form-group">
      <label for="address">Address</label>
      <input
        type="text"
        name="address"
        id="address"
        class="form-control"
        required
      >
    </div>

    <div class="form-group">
      <label for="city">City</label>
      <input
        type="text"
        name="city"
        id="city"
        class="form-control"
        required
      >
    </div>

    <div class="form-group">
      <label for="state">State</label>
      <input
        type="text"
        name="state"
        id="state"
        class="form-control"
        required
      >
    </div>

    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input
        type="text"
        name="zip"
        id="zip"
        class="form-control"
        required
      >
    </div>

    <div class="form-group">
      <label for="phone-number">Phone Number</label>
      <the-mask
        :mask="'###-###-####'"
        name="phone_number"
        id="phone-number"
        class="form-control"
        required
      />
    </div>

    <div class="tger-button-container">
      <button
        class="button6"
        @click="purchase"
        type="submit"
        :disabled="processing"
      >
        Purchase
      </button>
    </div>
  </form>
</template>

<script>
import { loadStripe } from '@stripe/stripe-js'
// import WaiverCard from './WaiverCard';
import { TheMask } from 'vue-the-mask'

export default {
  components: {
    // WaiverCard,
    TheMask
  },
  props: {
    location: {
      type: Object,
      required: true
    },
    market: {
      type: Object,
      required: true
    },
    body: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      cardHolderName: '',
      stripeCard: null,
      stripe: null,
      paymentMethodId: '',
      processing: false,
      show: false
    }
  },
  mounted () {
    this.attachStripeCard()
  },
  methods: {
    async attachStripeCard () {
      this.stripe = await loadStripe(this.stripeKey)

      this.cardElement = this.stripe.elements()
        .create('card')

      this.cardElement.mount(this.$refs.stripeCard)
    },
    async purchase (e) {
      e.preventDefault()

      this.processing = true

      const { paymentMethod, error } = await this.stripe.createPaymentMethod(
        'card', this.cardElement, {
          billing_details: {
            name: this.cardHolderName
          }
        }
      )

      if (error) {
        console.error(error)

        this.processing = false
      } else {
        new Promise(resolve => {
          this.paymentMethodId = paymentMethod.id

          resolve()
        }).then(() => {
          this.$refs.form.submit()
        })
      }
    },
    toggle () {
      this.show = !this.show
    }
  },
  computed: {
    stripeKey () {
      return this.location.stripe_publishable
    }
  }
}
</script>

<style lang="css">
  .StripeElement.StripeElement--empty {
    border: 1px solid #ced4da;
    padding: 10px;
    margin: 20px 0;
  }
</style>
