<script>

</script>

<template>
    <div class="bg-cover bg-center h-screen bgi min-h-screen">
        <header class="bg-[#333333] h-[10vh] flex items-center">
            <!-- First Segment (Empty) -->
            <div class="flex-1 mr-5"></div>

            <!-- Second Segment (White Box with Logo) -->
            <div class="flex-1 h-full flex items-center justify-center">
                <div class="bg-white p-2 rounded-xl flex items-center">
                    <img src="@/assets/logo.png" class="w-22 h-8 mx-auto" alt="Logo" />
                </div>
            </div>

            <!-- Third Segment (Scalable Camera Icon) -->
            <div class="flex-1 flex items-center justify-end pr-8">
                <img src="@/assets/KameraIcon_TOFTing_CHE.png" class="max-w-full h-auto" alt="Camera Icon" />
            </div>
        </header>
        <div class="bg-[#333333] h-[7%] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl flex items-center justify-center"
            :style="{ border: '0.35rem solid #CC0000' }">
            <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">Finde die Errungenschaften</h2>
        </div>
        <div class="bg-[#333333] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl" :style="{ border: '0.35rem solid #CC0000' }">
            <h1 class="text-[#CCCCCC] font-alegreya-sans-sc font-extrabold text-center mt-[3%] mb-[3%] text-4xl">
                Errungenschaften</h1>
            <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">16/16</h2>

            <!-- Flex container for images -->
            <div class="flex flex-wrap justify-center gap-4 p-4">
                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>

                <div class="w-[45%] h-auto rounded-md">
                    <img src="@/assets/achievements/a1_ul.png" class="w-full h-full rounded-md" />
                </div>
            </div>
        </div>
        <footer class="bg-[#CC0000] h-[10vh] flex items-center">
            <div class="flex-1">
                <p class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-xxs ml-4">
                    @COPYRIGHT - IMPRESSUM
                </p>
            </div>
            <div class="flex-1 flex items-center justify-center">
                <a
                    href="https://linktr.ee/tofting?utm_source=linktree_profile_share&ltsid=59e713d6-cc5d-4467-ac43-1b5a8384219f">
                    <img src="@/assets/tofting.png" class="w-[4em] h-[4em]" />
                </a>
            </div>
            <div class="flex-1 flex items-center justify-end mr-4">
                <a href="">
                    <img src="@/assets/Alternative Logo.svg" class="w-[6em] h-[6em]" />
                </a>
            </div>
        </footer>
    </div>
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