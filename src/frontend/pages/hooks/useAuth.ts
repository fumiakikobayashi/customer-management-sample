import {useUserState} from "../../atoms/userAtom";
import axios from "../../libs/axios";

export const useAuth = () => {
    const { user, setUser } = useUserState()

    const checkLoggedIn = async (): Promise<boolean> => {
        if (user) {
            return true
        }

        try {
            const response = await axios.get('http://localhost/api/user')
            if (!response.data.id) {
                return false
            }
            setUser(response.data.id)
            return true
        } catch {
            return false
        }
    }

    return { checkLoggedIn }
}
