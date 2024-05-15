<template>
  <div>
    <h1>Speakers</h1>
    <!-- Form for creating a new speaker -->
    <form @submit.prevent="createSpeaker">
      <label for="newName">Name:</label>
      <input type="text" id="newName" v-model="newSpeaker.name" required><br>
      <label for="newSkusenosti">Skusenosti:</label>
      <input type="text" id="newSkusenosti" v-model="newSpeaker.skusenosti" required><br>
      <label for="newFirma">Firma:</label>
      <input type="text" id="newFirma" v-model="newSpeaker.firma" required><br>
      <label for="newLinkedIn">LinkedIn:</label>
      <input type="text" id="newLinkedIn" v-model="newSpeaker.linkedIn" required><br>
      <label for="newImageLink">Image Link:</label>
      <input type="text" id="newImageLink" v-model="newSpeaker.imageLink" required><br>
      <button type="submit">Create Speaker</button>
    </form>

    <ul>
      <li v-for="speaker in speakers" :key="speaker.id">
        <!-- Form for updating speaker information -->
        <form @submit.prevent="updateSpeaker(speaker)">
          <label for="speakerName">Name:</label>
          <input type="text" id="speakerName" v-model="speaker.name" required><br>
          <label for="speakerSkusenosti">Skusenosti:</label>
          <input type="text" id="speakerSkusenosti" v-model="speaker.skusenosti" required><br>
          <label for="speakerFirma">Firma:</label>
          <input type="text" id="speakerFirma" v-model="speaker.firma" required><br>
          <label for="speakerLinkedIn">LinkedIn:</label>
          <input type="text" id="speakerLinkedIn" v-model="speaker.linkedIn" required><br>
          <label for="speakerImageLink">Image Link:</label>
          <input type="text" id="speakerImageLink" v-model="speaker.imageLink" required><br>
          <button type="submit">Update Speaker</button>
        </form>
        <button @click="deleteSpeaker(speaker.id)">Delete</button>
        <strong>ID:</strong> {{ speaker.id }}<br>
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
      speakers: [],
      newSpeaker: {
        name: '',
        skusenosti: '',
        firma: '',
        linkedIn: '',
        imageLink: ''
      }
    };
  },
  mounted() {
    this.fetchSpeakers();
  },
  methods: {
    async fetchSpeakers() {
      try {
        const response = await axios.get('http://localhost/backend_projekt/public/api/speakers'); // Changed URL to use relative path
        this.speakers = response.data;
      } catch (error) {
        console.error('Error fetching speakers:', error);
      }
    },
    async createSpeaker() {
      try {
        const response = await axios.post('http://localhost/backend_projekt/public/api/speakers', this.newSpeaker); // Changed URL to use relative path
        this.speakers.push(response.data.speaker);
        this.newSpeaker.firma = ''
        this.newSpeaker.name = ''
        this.newSpeaker.imageLink = ''
        this.newSpeaker.linkedIn = ''
        this.newSpeaker.skusenosti = ''
        this.clearNewSpeakerFields();
      } catch (error) {
        console.error('Error creating speaker:', error);
      }
    },
    async updateSpeaker(speaker) {
      try {
        await axios.put(`http://localhost/backend_projekt/public/api/speakers/${speaker.id}`, speaker); // Changed URL to use relative path
        // Assuming successful update, no need to update local data, as it's already reactive.
      } catch (error) {
        console.error('Error updating speaker:', error);
      }
    },
    async deleteSpeaker(id) {
      try {
        await axios.delete(`http://localhost/backend_projekt/public/api/speakers/${id}`); // Changed URL to use relative path
        this.speakers = this.speakers.filter(speaker => speaker.id !== id);
      } catch (error) {
        console.error('Error deleting speaker:', error);
      }
    },
    clearNewSpeakerFields() {
      this.newSpeaker.name = '';
      this.newSpeaker.skusenosti = '';
      this.newSpeaker.firma = '';
      this.newSpeaker.linkedIn = '';
      this.newSpeaker.imageLink = '';
    }
  }
};
</script>
