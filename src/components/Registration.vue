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
                Login  <BootstrapInput v-model="formData.login" />
                Password  <BootstrapInput v-model="formData.password" />
                E-mail <BootstrapInput />
            </div>
            <div>
                <BootstrapButton variant="primary">
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
      grid-template-rows: 1fr 2fr 1fr;
      width: 300px;
      border: 2px solid #3498db;
      //#66bfa1;
      border-radius: 8px;
      grid-row-gap: 25px;
      padding: 15px;

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
                    password: ''
                }
            };
        },

        watch: {
            'formData.login' (newVal) {
                console.log(" Value from our watcher ->>>>", newVal)
            }
        },

        methods: {
            registrationRequest () {

            }
        }

    }
</script>

<style scoped>
    .content {

    }
</style>