<template>
  <div class="bg-cover bg-center h-screen min-h-screen">
    <header class="bg-[#333333] h-[10%] flex items-center">
      <!-- Second Segment (White Box with Logo) -->
      <div class="flex-1 h-full flex items-center justify-center">
        <div class="bg-white p-2 rounded-xl flex items-center">
          <img src="@/assets/logo.png" class="w-30 h-8 mx-auto" alt="Logo"/>
        </div>
      </div>

    </header>
    <div class="bg-[#333333] h-[7%] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl flex items-center justify-center"
         :style="{ border: '0.35rem solid #CC0000' }">
      <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-[6vw]">
        Finde die Errungenschaften
      </h2>
    </div>
    <div class="bg-[#333333] w-[90%] mb-[3%] mt-[3%] mx-auto rounded-3xl" :style="{ border: '0.35rem solid #CC0000' }">
      <h1 class="text-[#CCCCCC] font-alegreya-sans-sc font-extrabold text-center mt-[3%] mb-[3%] text-[9vw]">
        Errungenschaften
      </h1>
      <h2 class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-center text-xl">16/16</h2>

      <!-- Flex container for images -->
      <div class="flex flex-wrap justify-center gap-4 p-4">
        <div v-for="badge in badges"class="w-[45%]">
        <Badge :key="badge.id" :idBadge="badge.id" :unlockedBadgeIds="unlockedBadgeIds"/>
        </div>
      </div>
    </div>
    <!-- ... (existing code) -->
    <footer class="bg-[#CC0000] h-[10%] flex items-center">
      <div class="flex-1">
        <p class="text-[#CCCCCC] font-alegreya-sans-sc font-bold text-xxs ml-4">@COPYRIGHT - IMPRESSUM</p>
      </div>
      <div class="flex-1 flex items-center justify-center">
        <a href="https://linktr.ee/tofting?utm_source=linktree_profile_share&ltsid=59e713d6-cc5d-4467-ac43-1b5a8384219f">
          <img src="@/assets/tofting.png" class="w-[4em] h-[4em]"/>
        </a>
      </div>
      <div class="flex-1 flex items-center justify-end mr-4">
        <a href="https://www.easyname.at/de">
          <img src="@/assets/Alternative Logo.svg" class="w-[6em] h-[6em]"/>
        </a>
      </div>
    </footer>
  </div>
</template>

<script>
import Badge from '@/components/Badge.vue';
import {v4 as uuidv4} from 'uuid';

export default {
  components: {
    Badge,
  },
  data() {
    return {
      allAchievements: [],
      unlockedBadgeIds: [],
      badges: [],
      generatedGuid: '',
    };
  },
  mounted() {
    // Versuchen Sie, die GUID aus dem localStorage abzurufen
    const cachedGuid = localStorage.getItem('myCachedGuid');

    if (cachedGuid) {
      // Wenn die GUID im localStorage vorhanden ist, verwenden Sie diese
      this.generatedGuid = cachedGuid;
    } else {
      // Wenn die GUID nicht im localStorage vorhanden ist, erstellen Sie eine neue
      this.generatedGuid = uuidv4();

      // Speichern Sie die GUID im localStorage für zukünftige Verwendung
      localStorage.setItem('myCachedGuid', this.generatedGuid);
      this.createUser(this.generatedGuid);
    }

    // Check for achievement ID in the URL when the component is created
    this.checkForAchievementId();

    this.fetchAchievementsData();

    // React to route changes
    this.$router.afterEach((to, from) => {
      if (to.name === 'Achievement') {
        // Extract the achievementId from the route params
        const achievementId = parseInt(to.params.achievementId, 10);
        if (!isNaN(achievementId)) {
          // Call addAchievement with the extracted achievementId
          this.addAchievement(achievementId);
        }
      }
    });
  },
  methods: {
    checkForAchievementId() {
      const urlParams = new URLSearchParams(window.location.search);
      const achievementIdParam = urlParams.get('achievementID');

      if (achievementIdParam !== null) {
        const achievementId = parseInt(achievementIdParam, 10);
        if (!isNaN(achievementId)) {
          // Call addAchievement with the extracted achievementId
          this.addAchievement(achievementId);
        }
      }
    },

    async fetchAchievementsData() {
      try {
        const response = await fetch('http://api.tofting.at/?guid=' + localStorage.getItem('myCachedGuid'), {
          headers: {
            'Cache-Control': 'no-cache'
          }
        });
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
        this.badges.push({id: index});
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

    createUser(setGuid) {
      fetch('http://api.tofting.at/', {
        method: 'POST',
        headers: {
          'Content-Type': 'text/json',
        },
        body: JSON.stringify({guid: setGuid}),
      })
          .then(response => {
            if (!response.ok) {
              throw new Error('Failed to create user');
            }
            // Handle successful response if needed
            console.log('User created successfully');
          })
          .catch(error => {
            console.error('Error creating user:', error);
            // Handle error or provide user feedback
          });
    },

    async addAchievement(scannedID) {
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

        // No need to read the response body if not used
        console.log('Added achievement successfully');
        console.log(this.unlockedBadgeIds);
      } catch (error) {
        console.error('Error adding achievement:', error);
      }
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
