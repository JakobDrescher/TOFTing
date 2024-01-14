<template>
    <div class="flex h-screen items-center max-w-[100%]">
        <div class="flex flex-wrap flex-col grow mx-[5%] rounded-3xl border-2 border-[#CC0000] bg-[#333333]">
            <img class="mt-[-44pt] self-center" src="../assets/Masköttchen_looking_over_TOFTing_Dragan.png" width="200vw">
            <div class="flex justify-start items-center m-[5%]">
                <img v-if="achievement" :src="`/src/assets/achievements/unlocked/a${achievement.id}_ul.png`" width="100vw">
                <div v-if="achievement" class="text-[30pt] ml-[5%]">{{ achievement.name }}</div>
            </div>
            <div class="flex flex-col mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px]">Abteilung</div>
                <div v-if="achievement" class="text-[18px]">{{ achievement.department.name }}</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <div class="flex flex-col mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px]">Standort</div>
                <div v-if="achievement" class="text-[18px]">{{ achievement.location.name }} [{{ achievement.location.roomNumber }}]</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <div class="flex flex-col flex-wrap mx-[20%] text-[#CCCCCC]">
                <div class="text-[25px]">Beschreibung</div>
                <div v-if="achievement" class="text-[18px] break-words">{{ achievement.description }}</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center">
                <hr width="70%">
            </div>
            <button
                class="mx-[30%] mt-[5%] mb-[10%] bg-[#FFFFFF] text-[#333333] py-[2%] rounded-md border-2 border-[#CC0000]">
                Hauptseite
            </button>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'
export default {
    data() {
        return {
            achievement: null
        }
    },
    mounted() {
        fetch('https://virtserver.swaggerhub.com/0151/TOFTing2/2.0.0/all')
        .then(res => res.json())
        .then(data => this.achievement = data[0])
        .catch(err => console.log(err.message))
    }
}
</script>

<style>
body {
    background-image: url("../assets/Hintergrund.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
}
</style>