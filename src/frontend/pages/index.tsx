import type { NextPage } from "next"
import Head from "next/head"
import Link from "next/link";
import axios from "../libs/axios";

const Home: NextPage = () => {
    const logout = async () => {

        await axios.get('http://localhost/sanctum/csrf-cookie')
            .then(res => {
                fetchUserRegister()
            })
    }

    const fetchUserRegister = async () => {
        return await axios.post('http://localhost/api/logaut')
            .then(response => {
            })
            .catch(err => {
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
