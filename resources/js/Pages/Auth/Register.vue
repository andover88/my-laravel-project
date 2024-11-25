<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="auth-container">
        <AuthenticationCard class="register-card">
            <template #logo>
                <AuthenticationCardLogo />
            </template>

            <h2 class="title">Sign up to see photos and videos from your friends.</h2>

            <form @submit.prevent="submit" class="register-form">
                <TextInput
                    v-model="form.email"
                    type="email"
                    placeholder="Mobile Number or Email"
                    required
                    class="input-field"
                />
                <InputError :message="form.errors.email" />

                <TextInput
                    v-model="form.name"
                    type="text"
                    placeholder="Full Name"
                    required
                    class="input-field mt-2"
                />
                <InputError :message="form.errors.name" />

                <TextInput
                    v-model="form.password"
                    type="password"
                    placeholder="Password"
                    required
                    class="input-field mt-2"
                />
                <InputError :message="form.errors.password" />

                <PrimaryButton :class="{ 'opacity-50': form.processing }" :disabled="form.processing" class="register-button mt-4">
                    Sign Up
                </PrimaryButton>
            </form>

            <p class="terms-text">
                By signing up, you agree to our <Link href="/terms" class="text-link">Terms</Link> and <Link href="/policy" class="text-link">Privacy Policy</Link>.
            </p>
        </AuthenticationCard>

        <div class="login-prompt">
            <p>Have an account? <Link href="/login" class="text-link">Log in</Link></p>
        </div>
    </div>
</template>

<style>
.auth-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #fafafa;
}

.register-card {
    width: 100%;
    max-width: 350px;
    padding: 40px 40px;
    text-align: center;
    border: 1px solid #dbdbdb;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
}

.title {
    font-size: 16px;
    font-weight: bold;
    color: #8e8e8e;
    margin-bottom: 20px;
}

.register-form {
    display: flex;
    flex-direction: column;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #dbdbdb;
    border-radius: 5px;
    font-size: 14px;
    background-color: #fafafa;
    margin-top: 8px;
}

.input-field:focus {
    border-color: #a3a3a3;
    background-color: #fff;
}

.register-button {
    width: 100%;
    padding: 10px;
    margin-top: 12px;
    border-radius: 5px;
    background-color: #0095f6;
    color: #fff;
    font-weight: bold;
    transition: background-color 0.3s;
}

.register-button:hover {
    background-color: #007ac1;
}

.terms-text {
    font-size: 12px;
    color: #8e8e8e;
    margin-top: 15px;
}

.text-link {
    color: #0095f6;
    text-decoration: none;
}

.text-link:hover {
    text-decoration: underline;
}

.login-prompt {
    padding: 20px;
    text-align: center;
    font-size: 14px;
    color: #8e8e8e;
}
</style>
