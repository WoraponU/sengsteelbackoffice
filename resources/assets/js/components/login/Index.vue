<template>
    <div class="container">
        <form action="/login/auth" method="POST">
            <input type="hidden" name="_token" v-model="csrfToken">

            <div class="row">
                <div class="card-panel col s8 m6 l4 offset-l4 offset-m3 offset-s2">
                    <div class="row">
                        <div class="col s12 m12 l12 center-align">
                            <h3>เข้าสู่ระบบ</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s10 m10 l10 offset-l1 offset-m1 offset-s1">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="username" name="username" type="text" class="validate" required>
                            <label for="username">บัญชีผู้ใช้</label>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s10 m10 l10 offset-l1 offset-m1 offset-s1">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" name="password" type="password" class="validate" required>
                                <label for="password">รหัสผ่าน</label>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <button class="btn waves-effect waves-light col s10 m10 l10 offset-l1 offset-m1 offset-s1" type="submit" name="action">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrfToken: window.Laravel.csrfToken,
            }
        },
    }
</script>