<template>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
            <div class="lg:col-span-2">
                <h1 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">{{ header }}</h1>
            </div>
            <div>
                <!-- Include PhasePicker component -->
                <PhasePicker @phase-changed="handlePhaseChange" />
            </div>
        </div>
    </div>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <p v-if="state.loading">Loading...</p>
            <div v-else class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
                <CourseCard v-for="course in data?.courses?.data" :key="course.id" :course="course" data-testid="course-card" />
            </div>
        </div>
    </main>
</template>

<script setup>
import {computed, onMounted, reactive} from "vue";
import CourseCard from "../components/CourseCard.vue";
import PhasePicker from "../components/PhasePicker.vue";

const data = reactive({
    courses: {},   // Stores the courses
    phase: null,   // Stores the selected phase
})

const state = reactive({
    loading: false, // Loading state for courses
})

const header = computed(() => `${data.courses?.total ?? 0} ${data.phase ? data.phase + ' ' : ''}Courses`)

onMounted( () => {
    getCourses();
})

// Fetch courses from the API
async function getCourses() {
    state.loading = true;

    console.log("Fetching courses for phase:", data.phase);

    try {
        const response = await axios.get("/api/courses", {
            params: { phase: data.phase },
        });

        data.courses = response.data;
    } catch (error) {
        console.error("Error fetching courses:", error);
        data.courses = {
        data: [],
        total: 0,
        };
    } finally {
        state.loading = false;
    }
}


// Handle phase changes from PhasePicker
function handlePhaseChange(phase) {
  data.phase = phase;
  getCourses();
}

</script>
