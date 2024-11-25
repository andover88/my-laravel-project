<template>
    <div class="upload-container">
        <h1 class="upload-title">Upload a Car Image</h1>
        <form @submit.prevent="uploadImage" class="upload-form">
            <input
                type="file"
                @change="onFileChange"
                accept="image/*"
                required
                class="file-input"
            />
            <img v-if="file" :src="URL.createObjectURL(file)" alt="Image Preview" class="image-preview" />
            <button type="submit" class="upload-button">Upload</button>
        </form>
        <div v-if="message" class="message">{{ message }}</div>
        <div v-if="error" class="error">{{ error }}</div>

        <!-- Return to Dashboard Button -->
        <button class="return-button" @click="goToDashboard">Return to Dashboard</button>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    setup() {
        const file = ref(null);
        const message = ref('');
        const error = ref('');

        const onFileChange = (event) => {
            file.value = event.target.files[0];
        };

        const uploadImage = () => {
            message.value = '';
            error.value = '';

            if (!file.value) {
                error.value = 'Please select an image.';
                return;
            }

            const formData = new FormData();
            formData.append('image', file.value);

            Inertia.post('/analyze-car-image', formData, {
                onSuccess: () => {
                    message.value = 'Image uploaded successfully.';
                },
                onError: (errors) => {
                    error.value = errors[0].message || 'An error occurred.';
                },
            });
        };

        const goToDashboard = () => {
            Inertia.visit('/dashboard'); // Adjust the route as needed
        };

        return {
            onFileChange,
            uploadImage,
            goToDashboard,
            message,
            error,
        };
    },
};
</script>

<style scoped>
.upload-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.upload-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.upload-form {
    display: flex;
    flex-direction: column;
}

.file-input {
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.upload-button {
    padding: 10px;
    background-color: #3897f0; /* Instagram's primary blue color */
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upload-button:hover {
    background-color: #007bbf; /* Darker shade on hover */
}

.return-button {
    margin-top: 20px;
    padding: 10px;
    background-color: #f0f0f0;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.return-button:hover {
    background-color: #e0e0e0; /* Slightly darker on hover */
}

.message {
    margin-top: 15px;
    color: green;
}

.error {
    margin-top: 15px;
    color: red;
}

.image-preview {
    margin: 10px 0;
    max-width: 100%;
    border-radius: 4px;
}
</style>
