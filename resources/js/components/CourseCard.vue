<template>
    <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        <div class="relative isolate flex flex-col justify-center overflow-hidden bg-gray-200 group-hover:opacity-75 px-8 h-48">
            <img src="./../../assets/course-bg.png" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
            <div>
                <h2 class="text-white text-xl font-medium">{{ course.title }}</h2>
            </div>
        </div>
        <div class="flex flex-1 flex-col space-y-2 p-4">
            <h3 class="text-md font-medium text-gray-900">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0" />
                    {{ course.title }}
                </a>
            </h3>
            <p class="text-sm text-gray-500">{{ course.description }}</p>
            <div class="flex flex-1 flex-col justify-end">
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg data-testid="yellow-star" v-for="n in (course.rating ?? 0)" class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                            <svg data-testid="grey-star" v-for="n in (5 - (course.rating ?? 0))" class="h-5 w-5 flex-shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex">
                            <p class="text-lg font-medium text-gray-900">£{{ course.price / 100 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

defineProps({
    course: Object
})
</script>
