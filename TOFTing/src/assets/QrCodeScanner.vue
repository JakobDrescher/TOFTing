<script>
import { QrcodeStream } from 'vue3-qrcode-reader'
export default {
    data() {
        return {
            error: '',
        }
    },
    components: {
        QrcodeStream
    },
    methods: {
        async onInit(promise) {
            try {
                const { capabilities } = await promise
            } catch (error) {
                if (error.name === 'NotAllowedError') {
                    this.error = "user denied camera access permission"
                } else if (error.name === 'NotFoundError') {
                    this.error = "no suitable camera device installed"
                } else if (error.name === 'NotSupportedError') {
                    this.error = "page is not served over HTTPS (or localhost)"
                } else if (error.name === 'NotReadableError') {
                    this.error = "maybe camera is already in use"
                } else if (error.name === 'OverconstrainedError') {
                    this.error = "did you request the front camera although there is none?"
                } else if (error.name === 'StreamApiNotSupportedError') {
                    this.error = "browser seems to be lacking features"
                }
            }
        }
    }
}
</script>

<template>
    <p>{{ error }}</p>
    <qrcode-stream @error="onError"></qrcode-stream>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;700;800&display=swap');

.font-alegreya-sans-sc {
    font-family: 'Alegreya Sans SC', sans-serif;
}

.bgi {
    background-image: url('@/assets/Hintergrund.png');
    background-size: cover;
    background-repeat: repeat;
}

@media (max-width: 1000px) {}
</style>