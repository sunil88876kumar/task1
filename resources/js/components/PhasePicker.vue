<template>
	<div>
	  <select
		v-model="selectedPhase"
		@change="onPhaseChange"
		id="phase"
		name="phase"
		class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-pink-600 sm:text-sm sm:leading-6"
	  >
		<option value="">All Phases</option>
		<option v-for="phase in phases" :key="phase.id" :value="phase.slug">
		  {{ phase.name }}
		</option>
	  </select>
	</div>
  </template>
  
  <script setup>
  import { ref, onMounted } from "vue";
  import axios from "axios";
  
  // Define emits for the component
  const emit = defineEmits(["phase-changed"]);
  
  const phases = ref([]);
  const selectedPhase = ref(null);
  
  // Emit the selected phase when the dropdown changes
  function onPhaseChange() {
	console.log("Emitting phase change:", selectedPhase.value); // Debug log
	emit("phase-changed", selectedPhase.value);
  }
  
  // Fetch the phases from the API
  async function fetchPhases() {
	try {
	  const response = await axios.get("/api/phases");
	  phases.value = response.data;
	} catch (error) {
	  console.error("Error fetching phases:", error);
	}
  }
  
  // Fetch phases when the component is mounted
  onMounted(() => {
	fetchPhases();
  });
  </script>
  