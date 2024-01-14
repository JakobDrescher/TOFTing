
<template>
  <div class="bg-cover bg-center h-screen bgi min-h-screen">
    <header class="bg-[#333333] h-[10%] flex items-center">
      <!-- First Segment (Empty) -->
      <div class="flex-1 mr-5"></div>

      <!-- Second Segment (White Box with Logo) -->
      <div class="flex-1 h-full flex items-center justify-center">
        <div class="bg-white p-2 rounded-xl flex items-center">
          <img src="@/assets/logo.png" class="w-30 h-8 mx-auto" alt="Logo" />
        </div>
      </div>

      <!-- Third Segment (Scalable Camera Icon) -->
      <div class="flex-1 flex items-center justify-end pr-8">
        <img src="@/assets/Kamera.png" class="max-w-full h-auto" alt="Camera Icon" />
      </div>
    </header>
    <div class="bg-[#333333] h-[7%] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl flex items-center justify-center"
      :style="{ border: '0.35rem solid #CC0000' }">
      <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">
        Finde die Errungenschaften
      </h2>
    </div>
    <div class="bg-[#333333] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl" :style="{ border: '0.35rem solid #CC0000' }">
      <h1 class="text-[#CCCCCC] font-alegreya-sans-sc font-extrabold text-center mt-[3%] mb-[3%] text-4xl">
        Errungenschaften
      </h1>
      <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">16/16</h2>

      <!-- Flex container for images -->
      <div class="flex flex-wrap justify-center gap-4 p-4">
        <Badge v-for="badge in badges" :key="badge.id" :idBadge="badge.id" :unlockedBadgeIds="unlockedBadgeIds" />
      </div>
    </div>
    <!-- ... (existing code) -->
    <footer class="bg-[#CC0000] h-[10%] flex items-center">
      <div class="flex-1">
        <p class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-xxs ml-4">@COPYRIGHT - IMPRESSUM</p>
      </div>
      <div class="flex-1 flex items-center justify-center">
        <a href="https://linktr.ee/tofting?utm_source=linktree_profile_share&ltsid=59e713d6-cc5d-4467-ac43-1b5a8384219f">
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

<script>
import Badge from '@/components/Badge.vue';

export default {
  components: {
    Badge,
  },
  data() {
    return {
      allAchievements: [],
      unlockedBadgeIds: [],
      badges: [],
    };
  },
  created() {
    this.fetchAchievementsData();
  },
  methods: {
    async fetchAchievementsData() {
      try {
        const response = await fetch('https://virtserver.swaggerhub.com/0151/TOFTing2/2.0.0/all');
        if (!response.ok) {
          throw new Error('Failed to fetch achievements data');
        }

        const data = await response.json();
        this.allAchievements = data;
        this.extractUnlockedBadgeIds();
      } catch (error) {
        console.error('Error fetching achievement data:', error);
      }
    },
    extractUnlockedBadgeIds() {
      // Ensure that unlockedBadgeIds is a regular array
      this.unlockedBadgeIds = this.allAchievements
        .filter((achievement) => achievement.id !== undefined)
        .map((achievement) => parseInt(achievement.id, 10));

      // Convert the array to a regular JavaScript array
      this.unlockedBadgeIds = Array.from(this.unlockedBadgeIds);

      // Log the extracted achievement IDs
      console.log('Extracted Achievement IDs:', this.unlockedBadgeIds);

      // Generate the badges array
      this.generateBadges();
    },
    generateBadges() {
      this.badges = [];
      for (let index = 1; index <= 16; index++) {
        this.badges.push({ id: index });
      }

      // Log the generated badges
      console.log('Generated Badges:', this.badges);

      // Log the paths for each badge based on its unlocked status
      this.badges.forEach((badge) => {
        const isUnlocked = this.unlockedBadgeIds.includes(badge.id);
        const path = `/src/assets/achievements/${isUnlocked ? 'unlocked' : 'locked'}/a${badge.id}_${isUnlocked ? 'ul' : 'l'}.png`;

        console.log(`Badge ${badge.id} path: ${path}`);
      });
    },
    // Add a method to update badges when new achievements are added
    updateBadges() {
      // Call generateBadges to update the badges array
      this.generateBadges();
    },
  },
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;700;800&display=swap');

.font-alegreya-sans-sc {
  font-family: 'Alegreya Sans SC', sans-serif;
}

.bgi {
  background-image: url('@/assets/Hintergrund.png');
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
}
</style>
