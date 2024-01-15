<template>
  <div class="w-[45%] h-auto rounded-md" @click="navigateToAchievement">
    <img :src="achievementPath" class="w-full h-full rounded-md" />
  </div>
</template>

<script setup>
import { computed, defineProps, ref, getCurrentInstance } from 'vue';

const { idBadge, unlockedBadgeIds } = defineProps(['idBadge', 'unlockedBadgeIds']);
const context = getCurrentInstance();

const achievementPath = computed(() => {
  const isUnlocked = unlockedBadgeIds.includes(idBadge);
  const path = `/src/assets/achievements/${isUnlocked ? 'unlocked' : 'locked'}/a${idBadge}_${isUnlocked ? 'ul' : 'l'}.png`;

  return path;
});

const navigateToAchievement = () => {
  if (unlockedBadgeIds.includes(idBadge)) {
    // Dynamically set achievementID based on the badge clicked
    context.proxy.$router.push({ name: 'achievement', params: { achievementId: idBadge } });
  }
};
</script>
