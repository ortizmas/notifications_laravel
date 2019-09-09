<template>
	<div>
		<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Notification ({{ notifications.length }})<span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<!-- <a class="dropdown-item" href="#" v-for="notification in notifications" :key="notification.id">
					{{ notification.data.comment.title }}
				</a> -->

				<notification
					v-for="notification in notifications" 
					:key="notification.id"
					:notification="notification">
				</notification>


				<a class="dropdown-item" href="#" @click.prevent="markAllAsRead">
					Limpar Notification
				</a>
			</div>
		</li>
	</div>
</template>

<script>
	export default{
		created () {
			//this.loadNotifications()
			this.$store.dispatch('loadNotifications')
		},

		computed: {
			notifications () {
				//return [] //this.notificationsItems
				return this.$store.state.notifications.items
			}
		},

		methods: {
			markAllAsRead () {
				this.$store.dispatch('markAllAsRead')
			}
		}

		// data() {
		// 	return {
		// 		notificationsItems: []
		// 	}
		// },

		// methods: {
		// 	loadNotifications () {
		// 		axios.get('/notifications')
		// 				.then(response => this.notificationsItems = response.data.notifications)
		// 	}
		// }
	}
</script>