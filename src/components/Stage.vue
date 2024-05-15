<template>
  <div>
    <h1>Stages</h1>
    <!-- Form for creating a new stage -->
    <form @submit.prevent="createStage">
      <label for="newName">Name:</label>
      <input type="text" id="newName" v-model="newStage.name" required><br>
      <label for="newDate">Date:</label>
      <input type="date" id="newDate" v-model="newStage.date" required><br>
      <button type="submit">Create Stage</button>
    </form>

    <ul>
      <li v-for="stage in stages" :key="stage.id">
        <!-- Form for updating stage information -->
        <form @submit.prevent="updateStage(stage)">
          <label for="stageName">Name:</label>
          <input type="text" id="stageName" v-model="stage.name" required><br>
          <label for="stageDate">Date:</label>
          <input type="date" id="stageDate" v-model="stage.date" required><br>
          <button type="submit">Update Stage</button>
        </form>
        <button @click="deleteStage(stage.id)">Delete</button>
        <strong>ID:</strong> {{ stage.id }}<br>
        <!-- You can remove displaying ID if it's not necessary -->
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      stages: [],
      newStage: {
        name: '',
        date: ''
      }
    };
  },
  mounted() {
    this.fetchStages();
  },
  methods: {
    async fetchStages() {
      try {
        const response = await axios.get('http://localhost/backend_projekt/public/api/stages');
        this.stages = response.data;
      } catch (error) {
        console.error('Error fetching stages:', error);
      }
    },
    async createStage() {
      try {
        const response = await axios.post('http://localhost/backend_projekt/public/api/stages', this.newStage);
        this.stages.push(response.data.stage);
        this.newStage.name = '';
        this.newStage.date = '';
      } catch (error) {
        console.error('Error creating stage:', error);
      }
    },
    async updateStage(stage) {
      try {
        await axios.put(`http://localhost/backend_projekt/public/api/stages/${stage.id}`, stage);
        // Assuming successful update, no need to update local data, as it's already reactive.
      } catch (error) {
        console.error('Error updating stage:', error);
      }
    },
    async deleteStage(id) {
      try {
        await axios.delete(`http://localhost/backend_projekt/public/api/stages/${id}`);
        this.stages = this.stages.filter(stage => stage.id !== id);
      } catch (error) {
        console.error('Error deleting stage:', error);
      }
    }
  }
};
</script>
