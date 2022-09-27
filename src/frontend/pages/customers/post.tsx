import type { NextPage } from "next"
import {useUserState} from "../../atoms/userAtom"
import axios from "../../libs/axios"
import {useEffect, useState} from "react"
import {NextRouter} from "next/dist/shared/lib/router/router"
import {useRouter} from "next/router"

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
    const { user } = useUserState()

    useEffect(() => {
        if (!user) {
            router.push('/login')
            return
        }
    }, [user, router])

    return (
        <div>
            投稿画面
        </div>
    )
}

export default Post
