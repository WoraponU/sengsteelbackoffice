<template>
    <div class="container">
        <div class="row">
            <div class="card-panel col s10 m8 l6 offset-l3 offset-m2 offset-s1">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h2>login</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="username" name="username" type="text" class="validate" required>
                        <label for="username">บัญชีผู้ใช้ <span class="icon-star">*</span></label>
                    </div> 
                </div>
                <div class="row">
                    <div class="row">
                        <div class="input-field col s12 m8 l6 offset-l3 offset-m2">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" name="password" type="text" class="validate" required>
                            <label for="password">รหัสผ่าน <span class="icon-star">*</span></label>
                        </div> 
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12 m12 l12 right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">เข้าสูระบบ
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>