<template>
    <div
        v-if="show"
        style="background-color: red;"
    >
        {{ message }}
    </div>
</template>

<script>
import EventBus from '../event-bus';

export default {
    data() {
        return {
            show: false,
            message: '',
        }
    },
    mounted() {
        EventBus.$on('error_thrown', message => this.showMessage(message));
    },
    beforeDestroy() {
        EventBus.$off('error_thrown');
    },
    methods: {
        showMessage(message) {
            this.message = message;
            this.show = true;

            setTimeout(() => {
                this.message = '';
                this.show = false;
            }, 5000);
        },
    },
};
</script>
