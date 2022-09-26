import {NextPage} from "next"
import Head from "next/head"
import {useRouter} from "next/router"
import { getCookie, setCookie } from 'typescript-cookie'
import {NextRouter} from "next/dist/shared/lib/router/router";
import axios from "../libs/axios";
import {useUserState} from "../atoms/userAtom";

axios.defaults.withCredentials = true

const Login: NextPage = () => {
    const router: NextRouter = useRouter()
    const { setUser } = useUserState()

    const login = async (event: any) => {
        event.preventDefault()
        const email = event.target.email.value
        const password = event.target.password.value

        await axios.get('http://localhost/sanctum/csrf-cookie')
            .then(() => {
                axios.post('http://localhost/api/login', {email: email, password: password})
                    .then(response => {
                        console.log(response)
                        setUser({id: 1})
                        router.push('/')
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            })
    }

    const fetchUserLogin = async (email: string, password:  string) => {
    }

    return (
        <>
            <Head>
                <title>ログイン</title>
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
                            ログイン
                        </h2>
                    </div>
                    <form
                        onSubmit={login}
                        className="mt-8 space-y-6"
                    >
                        <input
                            type="hidden"
                            name="remember"
                            defaultValue="true"
                        />
                        <div className="-space-y-px rounded-md shadow-sm">
                            <div>
                                <label htmlFor="email-address" className="sr-only">
                                    メールアドレス
                                </label>
                                <input
                                    id="email-address"
                                    name="email"
                                    type="email"
                                    autoComplete="email"
                                    required
                                    className="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="メールアドレス"
                                />
                            </div>
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
                                    className="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                    placeholder="パスワード"
                                />
                            </div>
                        </div>

                        <div className="flex items-center justify-between">
                            <div className="flex items-center">
                                <input
                                    id="remember-me"
                                    name="remember-me"
                                    type="checkbox"
                                    className="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                />
                                <label htmlFor="remember-me" className="ml-2 block text-sm text-gray-900">
                                    ログイン状態を保存する
                                </label>
                            </div>

                            <div className="text-sm">
                                <a href="#" className="font-medium text-indigo-600 hover:text-indigo-500">
                                    パスワードをお忘れの方はこちら
                                </a>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                className="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                ログイン
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </>
    )
}

export default Login
