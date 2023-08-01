<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        pages: Object | null | undefined
    });
</script>

<template>
    <nav class="flex p-3" aria-label="Pagination">
        <template v-for="(v, k) in props.pages.links" :key="k">
            <Link :href="v.url ?? ''" v-html="v.label"
                :class="[
                    v.active
                    ? 'bg-white text-blue-600'
                    : 'bg-blue-800 text-white',
                    ' relative z-10 inline-flex items-center px-4 py-2 hover:bg-white hover:text-blue-600',
                ]" />
        </template>
    </nav>
</template>
