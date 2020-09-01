<template>
    <layout title="Contact">
        <section class="bg-white border-b py-8 shadow-lg">
            <div class="container max-w-5xl mx-auto m-8">
                <form
                    method="post"
                    class="w-full mx-auto max-w-3xl bg-white shadow p-8 text-gray-700 rounded"
                    @submit.prevent="submit"
                >
                    <h2 class="w-full text-3xl font-bold leading-tight">
                        Contact
                    </h2>
                    <hr class="my-5" />
                    <div class="flex flex-wrap mb-6">
                        <div
                            class="relative w-full appearance-none label-floating"
                        >
                            <input
                                type="text"
                                name="name"
                                id="name"
                                v-model="form.name"
                                placeholder="Name"
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            />
                            <label
                                for="name"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                                >Name</label
                            >
                            <div
                                v-if="errors.name"
                                class="mt-1 text-red-600 text-sm font-medium"
                            >
                                {{ errors.name[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <div
                            class="relative w-full appearance-none label-floating"
                        >
                            <input
                                type="email"
                                name="email"
                                id="email"
                                v-model="form.email"
                                placeholder="Email"
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            />
                            <label
                                for="email"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                                >Email</label
                            >
                            <div
                                v-if="errors.email"
                                class="mt-1 text-red-600 text-sm font-medium"
                            >
                                {{ errors.email[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <div
                            class="relative w-full appearance-none label-floating"
                        >
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                v-model="form.phone"
                                placeholder="Phone"
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                            />
                            <label
                                for="email"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                                >Email</label
                            >
                            <div
                                v-if="errors.email"
                                class="mt-1 text-red-600 text-sm font-medium"
                            >
                                {{ errors.email[0] }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <div
                            class="relative w-full appearance-none label-floating"
                        >
                            <textarea
                                name="message"
                                id="message"
                                v-model="form.message"
                                @keydown="autosize"
                                ref="message"
                                class="tracking-wide py-2 px-4 mb-3 leading-relaxed appearance-none block w-full bg-gray-200 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Message"
                            ></textarea>
                            <label
                                for="message"
                                class="absolute tracking-wide py-2 px-4 mb-4 opacity-0 leading-tight block top-0 left-0 cursor-text"
                                >Message</label
                            >
                            <div
                                v-if="errors.message"
                                class="mt-1 text-red-600 text-sm font-medium"
                            >
                                {{ errors.message[0] }}
                            </div>
                            <small class="float-right text-gray-400"
                                >{{ form.message.length }}/200 characters</small
                            >
                        </div>
                    </div>

                    <button
                        @click.prevent="submit"
                        class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm "
                    >
                        Submit
                    </button>
                </form>
            </div>
        </section>
    </layout>
</template>

<script>
import Layout from "../../Components/Layout";

export default {
    props: {
        errors: Object
    },
    components: {
        Layout
    },
    data: function() {
        return {
            form: {
                name: "",
                email: "",
                phone: "",
                message: ""
            }
        };
    },
    remember: ["form"],
    methods: {
        submit: function() {
            // handle form submission
            this.$inertia.post("/contact", this.form);
        },
        autosize: function() {
            const el = this.$refs.message;
            setTimeout(() => {
                el.style.cssText = "height:auto; padding; 1.4rem .2rem .5rem";
                el.style.cssText = `height:${el.scrollHeight}px`;
            }, 0);
        }
    }
};
</script>

<style lang="scss" scoped></style>
