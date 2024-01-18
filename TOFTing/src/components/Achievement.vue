<template>
    <div class="flex items-center max-w-[100%] my-[88pt]">
        <div class="flex flex-wrap flex-col grow mx-[5%] rounded-3xl border-2 border-[#CC0000] bg-[#333333]">
            <img class="mt-[-44pt] self-center" src="../assets/mascot/mascot_looking_over.png" width="200vw">
            <div class="flex justify-start items-center m-[5%]">
                <img v-if="achievement" :src="`/src/assets/achievements/unlocked/a${achievement.id}_ul.png`" width="100vw">
                <div v-if="achievement" class="text-[23pt] text-[#CCCCCC] ml-[5%] font-alegreya-sans-sc font-extrabold">{{
                    achievement.name }}</div>
            </div>
            <div class="flex flex-col mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px] font-alegreya-sans-sc font-extrabold">Abteilung</div>
                <div v-if="achievement" class="text-[18px] font-alegreya-sans-sc">{{ achievement.department.name }}</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <div class="flex flex-col mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px] font-alegreya-sans-sc font-extrabold">Standort</div>
                <div v-if="achievement" v-for="(location, index) in achievement.location" :key="index"
                    class="text-[18px] font-alegreya-sans-sc">
                    {{ location.name }} [{{ location.roomNumber }}]</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <div class="flex flex-col flex-wrap mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px] font-alegreya-sans-sc font-extrabold">Beschreibung</div>
                <div v-if="achievement" class="text-[18px] font-alegreya-sans-sc break-words">{{ achievement.description }}
                </div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <button @click="redirectToMainPage"
                class="mx-[30%] mt-[5%] mb-[10%] bg-[#FFFFFF] text-[#333333] font-alegreya-sans-sc font-bold py-[2%] rounded-md border-2 border-[#CC0000]">
                Hauptseite
            </button>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
import { useRouter } from 'vue-router';

export default {
    data() {
        return {
            achievement: null,
        };
    },
    setup() {
        const router = useRouter();

        const redirectToMainPage = () => {
            router.push({ name: 'home' }); // Use the correct name for your MainPage route
        };

        return {
            redirectToMainPage,
        };
    },
    async mounted() {
        try {
            const response = await fetch(`http://api.tofting.at/?achievementID=${this.$route.params.achievementId}`);
            if (!response.ok) {
                throw new Error('Failed to fetch achievements data');
            }

            const data = await response.json();
            this.achievement = data[0];
        } catch (error) {
            console.error('Error fetching achievement data:', error);
        }
    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;700;800&display=swap');

.font-alegreya-sans-sc {
    font-family: 'Alegreya Sans SC', sans-serif;
}
</style>