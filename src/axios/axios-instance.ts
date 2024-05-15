import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost/backend_projekt/public/adminrozhranie'
});


// Môžete pridať interceptory pre požiadavky alebo odpovede

export default api;