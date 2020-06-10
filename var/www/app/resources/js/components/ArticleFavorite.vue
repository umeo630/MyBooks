<template>
    <div class="centered">
        <a
            class="btn btn-lg btn-theme02"
            v-if="isFavoritedBy === false"
            @click="clickFavorite"
        >
            <i class="fa fa-star"> お気に入り : {{ countFavorites }}</i>
        </a>
        <a
            class="btn btn-lg btn-primary"
            v-if="isFavoritedBy === true"
            @click="clickFavorite"
            >お気に入り済 : {{ countFavorites }}</a
        >
    </div>
</template>

<script>
export default {
    props: {
        initialIsFavoritedBy: {
            type: Boolean,
            default: false
        },
        initialCountFavorites: {
            type: Number,
            default: 0
        },
        authorized: {
            type: Boolean,
            default: false
        },
        endpoint: {
            type: String
        }
    },
    data() {
        return {
            isFavoritedBy: this.initialIsFavoritedBy,
            countFavorites: this.initialCountFavorites
        };
    },
    //クリックしたユーザーがログインしているかどうか
    //未ログインであればアラート表示
    methods: {
        clickFavorite() {
            if (!this.authorized) {
                alert("お気に入り機能はログイン中のみ使用できます");
                return;
            } //お気に入り済かどうか
            this.isFavoritedBy
                ? this.articleUnfavorite()
                : this.articleFavorite();
        }, //非同期通信でお気に入りとお気に入り解除を行う
        async articleFavorite() {
            const response = await axios.put(this.endpoint);

            this.isFavoritedBy = true;
            this.countFavorites = response.data.countFavorites;
        },
        async articleUnfavorite() {
            const response = await axios.delete(this.endpoint);

            this.isFavoritedBy = false;
            this.countFavorites = response.data.countFavorites;
        }
    }
};
</script>
