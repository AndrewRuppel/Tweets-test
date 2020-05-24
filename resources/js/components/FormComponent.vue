<template>
    <form id="send"
          class="form p-3 border rounded"
          @submit.prevent="send"
    >
        <div class="form-group">
            <label for="tweetCategory">Категория</label>
            <select class="custom-select"
                    id="tweetCategory"
                    name="category_id"
                    required
            >
                <option selected disabled>Выбрать</option>
                <slot>

                </slot>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="tweetUsername">Юзернейм</label>
            <input class="form-control"
                   id="tweetUsername"
                   name="username"
                   required>
        </div>
        <div class="form-group mb-2">
            <label for="tweetContent">Содержимое твита</label>
            <textarea class="form-control"
                      id="tweetContent"
                      name="content"
                      rows="3"
                      required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Отправить твит</button>
    </form>
</template>

<script>
    export default {
        name: "FormComponent",
        methods: {
            send() {
                let formData = new FormData(send);
                axios.post('/send_tweet', formData)
                    .then((response) => {
                        console.log(response)
                    })
                    .catch((error) => {
                        console.log(error.response)
                    })
                    .finally(() => {
                        document.getElementById('send').reset()
                    });
            }
        }
    }
</script>

<style scoped>

</style>
