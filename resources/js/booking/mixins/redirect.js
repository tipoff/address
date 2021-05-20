export default {
    methods: {
        redirectTo(path) {
            window.location.href = `${this.baseUrl}/${path}`;
        },
    },
    computed: {
        baseUrl() {
            const pathSegments = window.location.pathname.split('/');

            return `/${pathSegments[1]}/${pathSegments[2]}`;
        },
    },
};
