<template>
    <a class="nav-link" data-toggle="menubar" href="#" role="button" v-on:click="toggle">
        <i class="icon hamburger hamburger-arrow-left">
            <span class="sr-only">Toggle menubar</span>
            <span class="hamburger-bar"></span>
        </i>
    </a>
</template>

<script>
    export default {
        methods: {
            toggle() {
                axios.post(window.location.origin + '/api/menubar-toggle');
            }
        }
    }
</script>
