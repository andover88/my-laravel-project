<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="login-container">
        <AuthenticationCard class="login-card">
            <template #logo>
                <AuthenticationCardLogo />
            </template>

            <div v-if="status" class="status-message">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="login-form">
                <div class="input-group">
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="input-field"
                        placeholder="Phone number, username, or email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError :message="form.errors.email" class="error-message" />
                </div>

                <div class="input-group">
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="input-field"
                        placeholder="Password"
                        required
                        autocomplete="current-password"
                    />
                    <InputError :message="form.errors.password" class="error-message" />
                </div>

                <PrimaryButton class="login-button" :class="{ 'opacity-50': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>

                <div v-if="canResetPassword" class="forgot-password">
                    <Link :href="route('password.request')" class="text-link">
                        Forgot your password?
                    </Link>
                </div>
            </form>
            <!-- Divider with --or-- text -->
            <div class="divider">
                <span> or </span>
            </div>

            <!-- Register link -->
            <div class="signup-link">
                <p>Don't have an account? <Link href="/register" class="text-link">Sign up</Link></p>
            </div>
        </AuthenticationCard>

        <div class="signup-prompt">
            <p>Don't have an account? <Link href="/register" class="text-link">Sign up</Link></p>
        </div>
    </div>
</template>

<style>
.login-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #fafafa;
}

.login-card {
    width: 100%;
    max-width: 350px;
    padding: 40px 40px;
    margin-top: 50px;
    background-color: #fff;
    border: 1px solid #dbdbdb;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.status-message {
    font-size: 14px;
    color: #28a745;
    margin-bottom: 10px;
}

.login-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
}

.input-group {
    width: 100%;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #dbdbdb;
    border-radius: 5px;
    font-size: 14px;
    background-color: #fafafa;
    outline: none;
}

.input-field:focus {
    border-color: #a3a3a3;
    background-color: #fff;
}

.error-message {
    font-size: 12px;
    color: #e74c3c;
    margin-top: 5px;
}

.login-button {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background-color: #0095f6;
    color: #fff;
    font-weight: bold;
    transition: background-color 0.3s;
}

.login-button:hover {
    background-color: #007ac1;
}

.forgot-password {
    margin-top: 10px;
}

.text-link {
    color: #0095f6;
    font-size: 12px;
    text-decoration: none;
}

.text-link:hover {
    text-decoration: underline;
}

.signup-prompt {
    margin-top: 20px;
    font-size: 14px;
    color: #8e8e8e;
}

.signup-prompt .text-link {
    font-weight: bold;
    color: #0095f6;
}
.divider {
    display: flex;
    align-items: center;
    margin: 20px 0;
    font-size: 14px;
    color: #8e8e8e;
}

.divider::before,
.divider::after {
    content: "";
    flex: 1;
    height: 1px;
    background-color: #dbdbdb;
    margin: 0 10px;
}

.signup-link {
    font-size: 14px;
    color: #8e8e8e;
    margin-top: 10px;
}
</style>
