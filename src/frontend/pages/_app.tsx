import "tailwindcss/tailwind.css"
import type {AppProps} from "next/app"
import Layout from "./layout"
import {RecoilRoot} from "recoil";

function MyApp({Component, pageProps}: AppProps) {
    return (
        <RecoilRoot>
            <Layout>
                <Component {...pageProps} />
            </Layout>
        </RecoilRoot>
    );
}

export default MyApp
