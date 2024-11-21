<template>
    <div class="min-h-full">
        <Nav />
        <div class="py-10">
            <router-view v-slot="{ Component, route }">
                <div :key="route.name">
                    <Component :is="Component" />
                </div>
            </router-view>
        </div>
    </div>
</template>

<script setup lang="ts">
import Nav from "./components/Nav.vue";
</script>
