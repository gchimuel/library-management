<script setup>
    import Modal from "@/Components/Modal.vue";
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { useForm, usePage } from "@inertiajs/vue3";
    import { ref } from "vue";

    const props = defineProps({
        book: Object,
        current_page: Number
    });
    const authors = usePage().props.authors;
    const emits = defineEmits(["closeModal"]);

    const form = useForm({
        id: props.book.id,
        title: props.book.title,
        synopsis: props.book.synopsis,
        author_id: props.book.author_id,
        page: props.current_page
    });

    const update_book = () => {
        form.patch(route("library.update"), {
            preserveScroll: true,
            onSuccess: () => emits("closeModal"),
            onFinish: () => form.reset(),
        });
    };
</script>

<template>
    <Modal @close="emits('closeModal')">
        <div class="p-6">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Update</h2>
            </header>

            <form @submit.prevent="update_book" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="title" value="Title" />
                    <TextInput
                        id="title"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.title"
                        required
                        autocomplete="title" />
                    <InputError class="mt-2" :message="form.errors.title" />
                </div>
                <div>
                    <InputLabel for="synopsis" value="Synopsis" />
                    <textarea id="synopsis" rows="4" v-model="form.synopsis" required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                        >{{ form.synopsis  }}</textarea>
                    <InputError class="mt-2" :message="form.errors.synopsis" />
                </div>

                <div>
                    <InputLabel for="author_id" value="Author" />
                    <select
                        id="author_id"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
                        v-model="form.author_id"
                        required>
                        <option v-for="(v, k) in authors" :key="k" :value="k">{{ v }}</option>
                    </select>
                    <InputError class="mt-2" :message="form.errors.author_id" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Update</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0">
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                    </Transition>
                </div>
            </form>
        </div>
    </Modal>
</template>
