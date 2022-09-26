import {NextPage} from "next"
import Head from "next/head"
import {useRouter} from "next/router"
import { getCookie, setCookie } from 'typescript-cookie'
import {NextRouter} from "next/dist/shared/lib/router/router";
import axios from "../libs/axios";

axios.defaults.withCredentials = true

const register: NextPage = () => {
    const router: NextRouter = useRouter()

    const register = async (event: any) => {
        event.preventDefault()
        const accountName = event.target.name.value
        const email = event.target.email.value
        const password = event.target.password.value
        const passwordConfirm = event.target.password_confirm.value

        await axios.get('http://localhost/sanctum/csrf-cookie')
            .then(res => {
                fetchUserRegister(accountName, email, password, passwordConfirm)
            })
    }

    const fetchUserRegister = async (accountName: string, email: string, password: string, passwordConfirm: string) => {
        const requestData = {
            name: accountName,
            email: email,
            password: password,
            password_confirmation: passwordConfirm
        }
        return await axios.post('http://localhost/api/register', requestData)
            .then(response => {
                router.push('/customers')
            })
            .catch(err => {
            })
    }

    return (
        <>
            <Head>
                <title>新規登録</title>
            </Head>

            <div className="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
                <div className="w-full max-w-md space-y-8">
                    <div>
                        <img
                            className="mx-auto h-12 w-auto"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="Your Company"
                        />
                        <h2 className="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                            新規登録
                        </h2>
                    </div>
                    <form
                        onSubmit={register}
                        className="mt-8 space-y-6"
                    >
                        <input
                            type="hidden"
                            name="remember"
                            defaultValue="true"
                        />
                        <div className="-space-y-px rounded-md shadow-sm">
                            <label>
                                   アカウント名
                            </label>
                            <div>
                                <input
                                    id="name"
                                    name="name"
                                    autoComplete="name"
                                    required
                                    className="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="山田花子"
                                />
                            </div>

                            <label>
                                メールアドレス
                            </label>
                            <div>
                                <input
                                    id="email-address"
                                    name="email"
                                    type="email"
                                    autoComplete="email"
                                    required
                                    className="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="aaa@bbb.com"
                                />
                            </div>

                            <label>
                                パスワード
                            </label>
                            <div>
                                <label htmlFor="password" className="sr-only">
                                    Password
                                </label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    autoComplete="current-password"
                                    required
                                    className="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>

                            <label>
                                パスワード（確認用）
                            </label>
                            <div>
                                <label htmlFor="password" className="sr-only">
                                    Password
                                </label>
                                <input
                                    id="password_confirm"
                                    name="password_confirm"
                                    type="password"
                                    autoComplete="current-password"
                                    required
                                    className="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                />
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                className="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </>
    )
}

export default register
