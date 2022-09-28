import type { NextPage } from "next"
import {useEffect, useState} from "react"
import {NextRouter} from "next/dist/shared/lib/router/router"
import {useRouter} from "next/router"
import {useAuth} from "../hooks/useAuth";

type CustomerForm = {
    title: string;
    body: string;
}

const Post: NextPage = () => {
    const router: NextRouter = useRouter()
    const [customerForm, setCustomersForm] = useState<CustomerForm>({
        title: '',
        body: ''
    })
    const { checkLoggedIn } = useAuth()

    useEffect(() => {
        const init = async () => {
            const response: boolean = await checkLoggedIn()
            if (!response) {
                await router.push('/login')
            }
        }
        init()
    }, [])

    return (
        <div>
            投稿画面
        </div>
    )
}

export default Post
