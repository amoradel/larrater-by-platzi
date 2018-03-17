<template>
     <div class="dropdown-menu dropdown-menu-right">
        <a :href="'/'+ notification.data.follower.username" class="dropdown-item"  v-for="notification in notifications" :key="notification.id" >
            @{{notification.data.follower.username}} te ha seguido!
        </a>
    </div>
</template>

<script>
export default {
  data(){
      return {
          notifications: []
      }
  },
  mounted(){
      axios.get('/api/notifications')
      .then(res => {
          this.notifications = res.data;
      });
  }
}
</script>