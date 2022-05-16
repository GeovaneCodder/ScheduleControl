import IUserPermission from "./IUserPermission";

export default interface IUser {
    id: number,
    uuid: string,
    first_name: string,
    last_name: string,
    email: string,
    email_verified_at: string,
    created_at: string,
    updated_at: string,
    deleted_at: string | null,
    token: string,
    user_permissions?: Array<IUserPermission>,
}