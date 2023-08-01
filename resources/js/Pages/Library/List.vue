<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Pagination from "@/Pages/Library/Partials/Pagination.vue";
    import AddModal from "@/Pages/Library/Partials/Add.vue";
    import EditModal from "@/Pages/Library/Partials/Edit.vue";
    import DeleteModal from "@/Pages/Library/Partials/Delete.vue";
    import { Head } from '@inertiajs/vue3';
    import { ref } from "vue";

    const props = defineProps({
        books: Object | null | undefined,
        authors: Object | null | undefined,
    });
    const show_add_modal = ref(false);
    const show_update_modal = ref(false);
    const show_delete_modal = ref(false);
    const book_id = ref(null);
    const book = ref(null);

    const add_book = (id) => {
        show_add_modal.value = true;
    };

    const edit_book = (id) => {
        show_update_modal.value = true;
        book.value = props.books.data.find(item => item.id === id);
    };

    const remove_book = (id) => {
        show_delete_modal.value = true;
        book_id.value = id;
    };
</script>

<template>
    <Head title="Library Management" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Library</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-4 gap-4 content-start">
                    <div v-for="lib in props.books.data" :key="lib.id" class="relative rounded-t-lg rounded-b-lg m-1 text-white">
                        <div class="block bg-gray-500 rounded-t-lg p-3 font-bold capitalize text-lg">
                            {{  lib.title }}
                        </div>
                        <div class="p-3 bg-black">
                            <div class="font-thin text-sm mt-2">
                                {{  lib.synopsis }}
                            </div>

                            <div class="text-sm mt-3 italic">Author: {{ lib.author.first_name + ' ' + lib.author.last_name }}</div>

                            <div class="mt-2">
                                <button v-on:click="edit_book(lib.id)" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded mr-1">
                                    Edit
                                </button>
                                <button  v-on:click="remove_book(lib.id)" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 mt-5">
                    <div>
                        <button v-on:click="add_book()" class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded mr-1">
                            Add
                        </button>
                    </div>
                    <div>
                        <Pagination :pages="props.books" class="float-right" />
                    </div>
                </div>
            </div>
        </div>

        <AddModal v-if="show_add_modal" :show="show_add_modal" :current_page="props.books.current_page" @close-modal="show_add_modal = false" />
        <EditModal v-if="show_update_modal" :show="show_update_modal" :current_page="props.books.current_page" :book="book" @close-modal="show_update_modal = false" />
        <DeleteModal v-if="show_delete_modal" :show="show_delete_modal" :current_page="props.books.current_page" :book_id="book_id" @close-modal="show_delete_modal = false" />
    </AuthenticatedLayout>
</template>
