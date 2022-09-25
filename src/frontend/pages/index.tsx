import type { NextPage } from "next"
import Head from "next/head"
import Link from "next/link";

const Home: NextPage = () => {
    return (
        <div>
            <Head>
                <title>Index Page</title>
            </Head>
            <main>
                <Link href="/register">
                    <a>新規登録</a>
                </Link>
            </main>
        </div>
    );
};

export default Home
