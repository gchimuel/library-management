<script setup>
    import Modal from "@/Components/Modal.vue";
    import DangerButton from "@/Components/DangerButton.vue";
    import SecondaryButton from "@/Components/SecondaryButton.vue";
    import { useForm } from "@inertiajs/vue3";
    import { ref } from "vue";

    const props = defineProps({
        book_id: Number,
        current_page: Number
    });

    const emits = defineEmits(["closeModal"]);

    const form = useForm({
        id: props.book_id,
        page: props.current_page
    });

    const delete_book = () => {
        form.delete(route("library.destroy"), {
            preserveScroll: true,
            onSuccess: () => emits("closeModal"),
            onFinish: () => form.reset()
        });
    };
</script>

<template>
    <Modal @close="emits('closeModal')">
        <div class="p-6">
            <h2 class="text-lg font-medium text-white">
                Are you sure you want to delete this book?
            </h2>

            <div class="mt-6 flex justify-end">
                <DangerButton class="mr-3" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" @click="delete_book">Yes</DangerButton>
                <SecondaryButton @click="emits('closeModal')">No</SecondaryButton>
            </div>
        </div>
    </Modal>
</template>
