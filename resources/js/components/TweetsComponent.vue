<template>
    <div class="tweets">
        <div class="card my-3 tweet"
            v-for="tweet in tweets">
            <div class="card-header d-flex flex-row justify-content-between">
                <span>
                    {{ tweet.category ? tweet.category.title : '' }}
                </span>
                <span>
                    {{tweet.created_at ? tweet.created_at : ''}}
                </span>
            </div>
            <div class="card-body">
                <h3>{{tweet.username}}</h3>
                <p class="card-text">{{tweet.content}}</p>
            </div>
        </div>
        <button class="btn btn-primary" @click="loadMore" v-if="isEnd === false">Загрузить еще</button>
        <p v-else>Больше нет твитов</p>
    </div>
</template>

<script>
    export default {
        name: "TweetsComponent",
        data() {
            return {
                tweets: [],
                lastId: null,
                isEnd: false
            }
        },
        mounted() {
            axios.get('api/get_tweets')
                .then(response => {
                    this.tweets = response.data;
                    this.lastId = this.tweets[this.tweets.length - 1].id;
                })
                .catch(error => {
                    console.log(error.response);
                });

            Pusher.logToConsole = false;

            var pusher = new Pusher('82a64a28cb97cd4f214b', {
                cluster: 'eu'
            });

            var channel = pusher.subscribe('my-channel');

            channel.bind('my-event', (data) => {
                this.tweets.unshift(data)
            });
        },
        methods: {
            loadMore() {
                axios.get('api/get_tweets', {
                    params: {
                        last_id: this.lastId ? this.lastId : null
                    }
                })
                    .then(response => {
                        if (response.data.length > 0) {
                            this.tweets = this.tweets.concat(response.data)
                            this.lastId = this.tweets[this.tweets.length - 1].id;
                        } else {
                            this.isEnd = true;
                        }
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>
