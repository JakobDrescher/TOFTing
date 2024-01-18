<template>
  <div class="h-screen min-h-screen">
    <header class="bg-[#333333] h-[10%] flex items-center">
      <!-- First Segment (Empty) -->
      <div class="flex-1 mx-5">
      </div>

      <!-- Second Segment (White Box with Logo) -->
      <div class="flex-1 h-full flex items-center justify-center">
        <div class="bg-white p-2 rounded-xl flex items-center">
          <img src="@/assets/logo.png" class="w-30 h-8 mx-auto" alt="Logo" />
        </div>
      </div>

      <!-- Third Segment (Scalable Camera Icon) -->
      <div class="flex-1 flex items-center justify-end pr-8">
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
      <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">{{ unlockedBadgeIds.length }}/16</h2>

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
        <a href="https://www.easyname.at/de">
          <img src="@/assets/Alternative Logo.svg" class="w-[6em] h-[6em]" />
        </a>
      </div>
    </footer>
  </div>
</template>

<script>
import Badge from '@/components/Badge.vue';
import { v4 as uuidv4 } from 'uuid';

export default {
  components: {
    Badge,
  },
  data() {
    return {
      unlockedBadgeIds: [],
      badges: [],
      generatedGuid: '',
      saveInCache: true,
      loading: false,
    };
  },
  async mounted() {
    const cachedGuid = localStorage.getItem('myCachedGuid');

    if (cachedGuid) {
      this.generatedGuid = cachedGuid;
    } else {
      this.generatedGuid = uuidv4();
      localStorage.setItem('myCachedGuid', this.generatedGuid);
      this.createUser(this.generatedGuid);
    }

    this.fetchCachedAchievementIds();
    this.checkForAchievementId();

    this.$router.afterEach((to, from) => {
      if (to.name === 'Achievement') {
        const achievementId = parseInt(to.params.achievementId, 10);
        if (!isNaN(achievementId)) {
          this.addAchievement(achievementId);
        }
      }
    });

    this.achievementChannel = new BroadcastChannel('achievementChannel');
    this.achievementChannel.onmessage = (event) => {
      const newAchievementID = event.data.achievementID;
      this.addAchievement(newAchievementID);
    };
  },
  methods: {
    async fetchCachedAchievementIds() {
      const cachedAchievementIds = sessionStorage.getItem('cachedAchievementIds');
      if (cachedAchievementIds) {
        this.unlockedBadgeIds = JSON.parse(cachedAchievementIds);
        this.generateBadges();
      } else {
        await this.fetchAchievementsData();
      }
    },

    saveCachedAchievementIds() {
      sessionStorage.setItem('cachedAchievementIds', JSON.stringify(this.unlockedBadgeIds));
      this.generateBadges();
    },

    async fetchAchievementsData() {
      try {
        this.loading = true;
        const response = await fetch('http://api.tofting.at/?guid=' + this.generatedGuid);
        if (!response.ok) {
          throw new Error('Failed to fetch achievements data');
        }
        const data = await response.json();
        this.allAchievements = data;
        this.extractUnlockedBadgeIds();
      } catch (error) {
        console.error('Error fetching achievement data:', error);
      } finally {
        this.loading = false;
      }
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
        const isUnlocked = this.unlockedBadgeIds && this.unlockedBadgeIds.includes(badge.id);
        const path = `/src/assets/achievements/${isUnlocked ? 'unlocked' : 'locked'}/a${badge.id}_${isUnlocked ? 'ul' : 'l'}.png`;

        console.log(`Badge ${badge.id} path: ${path}`);
      });
    },

    extractUnlockedBadgeIds() {
      const extractedIds = this.allAchievements
        .filter((achievement) => achievement.id !== undefined)
        .map((achievement) => parseInt(achievement.id, 10));

      // Create a Set to ensure unique IDs
      const uniqueIdsSet = new Set(extractedIds);

      // Convert the Set back to an array
      this.unlockedBadgeIds = Array.from(uniqueIdsSet);

      console.log('Extracted Achievement IDs:', this.unlockedBadgeIds);

      this.saveCachedAchievementIds();
    },

    checkForAchievementId() {
      const urlParams = new URLSearchParams(window.location.search);
      const achievementIdParam = urlParams.get('achievementID');
      console.log(achievementIdParam);

      if (achievementIdParam !== null) {
        const achievementId = parseInt(achievementIdParam, 10);
        if (!isNaN(achievementId)) {
          console.log('Die achievement Id aus der url ist:' + achievementId);
          this.addAchievement(achievementId);
        }
      }
    },

    createUser(setGuid) {
      fetch('http://api.tofting.at/', {
        method: 'POST',
        headers: {
          'Content-Type': 'text/json',
        },
        body: JSON.stringify({ guid: setGuid }),
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Failed to create user');
          }
          console.log('User created successfully');
        })
        .catch(error => {
          console.error('Error creating user:', error);
        });
    },

    async addAchievement(scannedID) {
      if(!this.unlockedBadgeIds.includes(scannedID)){
        try {
        console.log('Request Body:', JSON.stringify({
          guid: this.generatedGuid,
          achievementID: scannedID,
        }));

        const response = await fetch('http://api.tofting.at/', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            guid: this.generatedGuid,
            achievementID: scannedID,
          }),
        });

        if (!response.ok) {
          throw new Error(`Failed to add achievement. Status: ${response.status}`);
        }

        this.unlockedBadgeIds.push(scannedID);
        console.log('Added achievement successfully');
        console.log(this.unlockedBadgeIds);

        this.updateBadges();
        this.achievementChannel.postMessage({ achievementID: scannedID });
      } catch (error) {
        console.error('Error adding achievement:', error);
      }
      }
    },

    updateBadges() {
      this.saveCachedAchievementIds();
    },
  },
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@400;700;800&display=swap');

.font-alegreya-sans-sc {
  font-family: 'Alegreya Sans SC', sans-serif;
}

body {
    background-image: url("../assets/Hintergrund.png");
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
}
</style>
