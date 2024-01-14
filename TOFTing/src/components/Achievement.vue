<template>
    <div class="flex h-screen items-center max-w-[100%]">
        <div class="flex flex-wrap flex-col grow mx-[5%] rounded-3xl border-2 border-[#CC0000] bg-[#333333]">
            <img v-if="achievement" class="mt-[-44pt] self-center" :src="achievement.icon" width="200vw">
            <div class="flex justify-start items-center m-[5%]" v-if="achievement">
                <img :src="achievement.icon" width="100vw">
                <div class="text-[30pt] ml-[5%]">{{ achievement.name }}</div>
            </div>
            <div class="flex flex-col mx-[20%] text-[#CCCCCC]" v-if="achievement && achievement.department">
                <div class="text-[25px]">Abteilung</div>
                <div class="text-[18px]">
                    {{ Array.isArray(achievement.department)
                        ? achievement.department.map((dept) => dept.name).join(', ')
                        : achievement.department.name }}
                </div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center" v-if="achievement">
                <hr width="70%">
            </div>
            <div class="flex flex-col flex-wrap mx-[20%] text-[#CCCCCC]" v-if="achievement">
                <div class="text-[25px]">Beschreibung</div>
                <div class="text-[18px] break-words">{{ achievement.description }}</div>
            </div>
            <div class="flex mt-[3vw] mb-[5vw] flex-col items-center" v-if="achievement">
                <hr width="70%">
            </div>
            <button @click="redirectToMainPage"
                class="mx-[30%] mt-[5%] mb-[10%] bg-[#FFFFFF] text-[#333333] py-[2%] rounded-md border-2 border-[#CC0000]">
                Hauptseite
            </button>
        </div>
    </div>
</template>
  

<script>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

export default {
    props: {
        achievementId: {
            type: String,
            required: true,
        },
    },
    setup(props) {
        const router = useRouter();
        const achievement = ref(null);

        const redirectToMainPage = () => {
            router.push({ name: 'main' });
        };

        onMounted(async () => {
            try {
                const response = await fetch(`http://api.tofting.at/?achievementID=${props.achievementId}`);
                const data = await response.json();
                achievement.value = data;
            } catch (error) {
                console.error(error.message);
            }
        });

        return {
            achievement,
            redirectToMainPage,
        };
    },
};
</script>

<style>
body {
    background-image: url("../assets/Hintergrund.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
}
</style>