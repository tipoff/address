<template>
    <div>
        <button class="button5" @click="toggle">Waiver</button>

        <div v-show="show">
            {{ body }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        body: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            show: false,
        };
    },
    methods: {
        toggle() {
            this.show = ! this.show;
        },
    },
};
</script>
