<template>
  <div class="w-[45%] h-auto rounded-md">
    <img :src="achievementPath" class="w-full h-full rounded-md" />
  </div>
</template>

<script setup>
import { computed, defineProps } from 'vue';
const { idBadge, unlockedBadgeIds } = defineProps(['idBadge', 'unlockedBadgeIds']);

const achievementPath = computed(() => {
  const isUnlocked = unlockedBadgeIds.includes(idBadge);
  const path = `/src/assets/achievements/${isUnlocked ? 'unlocked' : 'locked'}/a${idBadge}_${isUnlocked ? 'ul' : 'l'}.png`;

  return path;
});
</script>
