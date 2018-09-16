<template>
    <StyledContentBlock>
        <StyledRegistrationBlock>
            <div border="1px solid red">
                <BootstrapImage
                        :src="require('@/assets/img/shield2.png')"
                        width="70"
                        height="70"
                        rounded="circle"
                        blank-color="red"
                />
            </div>
            <div>
                Login
                <BootstrapInput
                        v-model="formData.login"
                        v-validate="'required'"
                        name="form_login"
                        maxlength="16"/>
                <span v-show="errors.has('form_login')" style="color: red;">
                    The field is not valid <br>
                </span>

                Name
                <BootstrapInput
                        v-model="formData.name"
                        v-validate="'required'"
                        name="form_name"
                        maxlength="16" />
                <span v-show="errors.has('form_name')" style="color: red;">
                    The field is not valid <br>
                </span>

                Password
                <BootstrapInput
                        v-model="formData.password"
                        name="form_password"
                        type="password"
                        v-validate="'min:6|required'" />

                <span v-show="errors.has('form_password')" style="color: red;">
                    Password less than 6 characters<br>
                </span>

                E-mail
                <BootstrapInput
                        v-model="formData.email"
                        name="form_email"
                        v-validate="'email|required'"
                        type="email"
                />
                <span v-show="errors.has('form_email')" style="color: red;">
                    Email is not valid<br>
                </span>
            </div>
            <div>
                <BootstrapButton variant="primary" @click="addUser">
                    Registration, {{formData.login}}
                </BootstrapButton>
            </div>
        </StyledRegistrationBlock>
    </StyledContentBlock>
</template>

<script>
    import styled from 'vue-styled-components';
    import BootstrapImage from 'bootstrap-vue/es/components/image/img';
    import BootstrapInput from 'bootstrap-vue/es/components/form-input/form-input';
    import BootstrapButton from 'bootstrap-vue/es/components/button/button';
    import BootstrapModal from 'bootstrap-vue/es/directives/modal/modal';


    const StyledContentBlock = styled('div')`
      display: grid;
      grid-template-rows: 1fr;
      justify-items: center;
`;
    const StyledRegistrationBlock = styled('div')`
      display: grid;
      grid-template-columns: 1fr;
      grid-template-rows: 0fr 2fr 0fr;
      width: 300px;
      border: 2px solid #3498db;
      //#66bfa1;
      border-radius: 8px;
      grid-row-gap: 25px;
      padding: 10px;

`;

    export default {
        name: 'Registration',

        components: {
            StyledContentBlock,
            StyledRegistrationBlock,
            BootstrapImage,
            BootstrapInput,
            BootstrapButton,
            BootstrapModal
        },
        data () {
            return {
                authorize: false,

                formData: {
                    login: '',
                    name: '',
                    password: '',
                    email: ''
                }
            };
        },
        methods: {
            validateForm (toasterType = 'Please, enter this fields', toasterMessage = 'Error') {
                return this.$validator.validateAll()
                        .then(result => {
                            if (!result) {
                                this.$toast.error(toasterType, toasterMessage,);
                                return false;
                            }

                            return true;
                        });
            },
            addUser () {
                this.validateForm()
                    .then((isFormValid) => {
                        if (!isFormValid) {
                            return;
                        }

                        const userData = {
                            form_data: {
                                name: this.formData.name,
                                email: this.formData.email,
                                user: this.formData.login,
                                password: this.formData.password
                            }
                        };

                        this.axios({
                            method: 'get',
                            url: 'http://todo.loc/api/server.php',
                            params: Object.assign(userData, { add_user: true })
                        })
                            .then((serverResponse) => {
                                const response = serverResponse.data;

                                console.log('response = ', response)

                                if (response.errors.length !== 0 && response.errors.includes('email')) {
                                    this.$toaster('error', 'User with this email is already exists', 'Error');
                                    return;
                                }

                                this.$router.push('/auth');
                            });
                    });
            }
        }

    }
</script>

<!--<style scoped>-->
    <!--.content {-->

    <!--}-->
<!--</style>-->