import type { NextPage } from "next"
import Head from "next/head"
import Link from "next/link";
import axios from "../libs/axios";

const Home: NextPage = () => {
    const logout = async () => {

        await axios.get('/sanctum/csrf-cookie')
            .then(() => {
                fetchUserRegister()
            })
    }

    const fetchUserRegister = async () => {
        return await axios.post('/api/logout')
            .then(() => {
            })
            .catch(() => {
            })
    }

    return (
        <div>
            <Head>
                <title>Index Page</title>
            </Head>
            <main>
                <Link href="/register">
                    <a>新規登録</a>
                </Link>
                <br/><br/>
                <Link href="/login">
                    <a>ログイン</a>
                </Link>
                <br/><br/>
                <button onClick={logout}>
                    <a>ログアウト</a>
                </button>
            </main>
        </div>
    );
};

export default Home
