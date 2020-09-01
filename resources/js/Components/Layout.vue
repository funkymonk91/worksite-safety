<template>
    <div scroll-region>
        <navbar></navbar>
        <hero></hero>
        <slot />
        <footer></footer>
    </div>
</template>

<script>
import Navbar from "./Navbar";
import Hero from "./Hero";
import Footer from "./Footer";
export default {
    props: { title: String },
    components: {
        Navbar,
        Hero,
        Footer
    },
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title;
            }
        }
    }
};
</script>

<style lang="scss" scoped></style>
